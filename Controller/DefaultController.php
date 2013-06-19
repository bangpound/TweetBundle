<?php

namespace Bangpound\Twitter\DataBundle\Controller;

use Bangpound\Twitter\DataBundle\Entity\Tweet;
use Doctrine\Common\Cache\FilesystemCache;
use Guzzle\Cache\DoctrineCacheAdapter;
use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;
use Guzzle\Http\QueryString;
use Guzzle\Log\MessageFormatter;
use Guzzle\Log\MonologLogAdapter;
use Guzzle\Plugin\Cache\CachePlugin;
use Guzzle\Plugin\Cache\DefaultCacheStorage;
use Guzzle\Plugin\Cache\SkipRevalidation;
use Guzzle\Plugin\Log\LogPlugin;
use Guzzle\Plugin\Oauth\OauthPlugin;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Sensio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Monolog\Logger;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BangpoundTwitterDataBundle:Default:index.html.twig', array('name' => $name));
    }

    /**
     *
     * @param Tweet $tweet
     */
    public function oembedTweetAction(Tweet $tweet)
    {
        $client = new Client('http://api.twitter.com/1.1');

        $dir = $this->container->getParameter('kernel.cache_dir') .'/oembed';
        $plugin = new CachePlugin(array(
            'storage' => new DefaultCacheStorage(
                new DoctrineCacheAdapter(
                    new FilesystemCache($dir, 'guzzlecache.data')
                )
            ),
            'revalidation' => new SkipRevalidation(),
        ));
        $client->addSubscriber($plugin);

        /* @var Symfony\Bridge\Monolog\Logger $logger */
        $logger = $this->container->get('logger');
        $plugin = new LogPlugin(
            new MonologLogAdapter($logger),
            MessageFormatter::DEBUG_FORMAT
        );
        $client->addSubscriber($plugin);

        $oauth = new OauthPlugin(array(
            'consumer_key'    => $this->container->getParameter('bangpound_phirehose.twitter_consumer_key'),
            'consumer_secret' => $this->container->getParameter('bangpound_phirehose.twitter_consumer_secret'),
            'token'           => $this->container->getParameter('bangpound_phirehose.oauth_token'),
            'token_secret'    => $this->container->getParameter('bangpound_phirehose.oauth_secret'),
        ));
        $client->addSubscriber($oauth);

        try {
            $query = new QueryString(array(
                'id' => $tweet->getIdStr(),
                'omit_script' => true,
            ));
            $request = $client->get('statuses/oembed.json?'. $query);
            $response = $request->send();
            $data = $response->json();
        }
        catch (BadResponseException $e) {
            $data = array('html' => '<div class="hero">This tweet was deleted.</div>');
        }
        $script = '<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
        return new Response($script . $data['html']);
    }
}
