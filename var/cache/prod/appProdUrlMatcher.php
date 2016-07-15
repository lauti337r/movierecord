<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // 
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => '',);
        }

        if (0 === strpos($pathinfo, '/a')) {
            // add
            if ($pathinfo === '/add') {
                return array (  '_controller' => 'AppBundle\\Controller\\addController::indexAction',  '_route' => 'add',);
            }

            // artist {artist}
            if (0 === strpos($pathinfo, '/artist') && preg_match('#^/artist/(?P<artist>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'artist {artist}')), array (  '_controller' => 'AppBundle\\Controller\\artistController::indexAction',));
            }

        }

        // contact
        if ($pathinfo === '/contact') {
            return array (  '_controller' => 'AppBundle\\Controller\\contactController::indexAction',  '_route' => 'contact',);
        }

        // genre {genero}
        if (0 === strpos($pathinfo, '/genre') && preg_match('#^/genre/(?P<genero>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'genre {genero}')), array (  '_controller' => 'AppBundle\\Controller\\genreController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/m')) {
            // main
            if ($pathinfo === '/main') {
                return array (  '_controller' => 'AppBundle\\Controller\\mainController::indexAction',  '_route' => 'main',);
            }

            if (0 === strpos($pathinfo, '/movies')) {
                // movies
                if ($pathinfo === '/movies') {
                    return array (  '_controller' => 'AppBundle\\Controller\\movieController::indexAction',  '_route' => 'movies',);
                }

                // random movie
                if ($pathinfo === '/movies/random') {
                    return array (  '_controller' => 'AppBundle\\Controller\\movieController::randomAction',  '_route' => 'random movie',);
                }

            }

        }

        // series
        if ($pathinfo === '/series') {
            return array (  '_controller' => 'AppBundle\\Controller\\serieController::indexAction',  '_route' => 'series',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
