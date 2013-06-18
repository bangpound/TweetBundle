<?php

namespace Bangpound\Twitter\DataBundle\Controller;

use Bangpound\Twitter\DataBundle\Entity\Tweet;
use Doctrine\Common\Cache\FilesystemCache;
use Guzzle\Cache\DoctrineCacheAdapter;
use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;
use Guzzle\Http\QueryString;
use Guzzle\Plugin\Cache\CachePlugin;
use Guzzle\Plugin\Oauth\OauthPlugin;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Sensio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Sensio\Route("/")
 */
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BangpoundTwitterDataBundle:Default:index.html.twig', array('name' => $name));
    }

    /**
     *
     * @param type $id
     * @Sensio\Route("/tweet/{tweet}")
     */
    public function oembedTweetAction(Tweet $tweet)
    {
        $dir = $this->container->getParameter('kernel.cache_dir') .'/oembed';
        $cachePlugin = new CachePlugin(new DoctrineCacheAdapter(new FilesystemCache($dir)));


        $client = new Client('http://api.twitter.com/1.1');
        $client->addSubscriber($cachePlugin);
        $container = $this->container;
        $oauth = new OauthPlugin(array(
            'consumer_key'    => $container->getParameter('bangpound_phirehose.twitter_consumer_key'),
            'consumer_secret' => $container->getParameter('bangpound_phirehose.twitter_consumer_secret'),
            'token'           => $container->getParameter('bangpound_phirehose.oauth_token'),
            'token_secret'    => $container->getParameter('bangpound_phirehose.oauth_secret'),
        ));
        $client->addSubscriber($oauth);

        try {
            $response = $client->get('statuses/oembed.json?id='. $tweet->getIdStr())->send();
            $data = $response->json();
        } catch (BadResponseException $e) {
            $data = array('html' => '<blockquote class="twitter-tweet"><p>'. $tweet->getText() .'</p></blockquote><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>');
        }
        return new Response($data['html']);
    }
}
