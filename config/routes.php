<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */

    // Home
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    // CV
    $routes->connect('/cv', ['controller' => 'Cv', 'action' => 'index']);
    $routes->connect('/cv/edit', ['controller' => 'Cv', 'action' => 'edit']);
    $routes->connect('/cv/add', ['controller' => 'Cv', 'action' => 'add']);
    $routes->connect('/cv/delete', ['controller' => 'Cv', 'action' => 'delete']);


    // Beheerders
    $routes->connect('/beheerders', ['controller' => 'Managers', 'action' => 'index']);
    $routes->connect('/beheerders/view/*', ['controller' => 'Managers', 'action' => 'view']);
    $routes->connect('/beheerders/create', ['controller' => 'Managers', 'action' => 'create']);
    $routes->connect('/beheerders/edit/*', ['controller' => 'Managers', 'action' => 'edit']);
    $routes->connect('/beheerders/delete/*', ['controller' => 'Managers', 'action' => 'delete']);

    // Categorieën
    $routes->connect('/categorieën', ['controller' => 'categories', 'action' => 'index']);
    $routes->connect('/categorieën/view/*', ['controller' => 'categories', 'action' => 'view']);
    $routes->connect('/categorieën/create', ['controller' => 'categories', 'action' => 'create']);
    $routes->connect('/categorieën/edit/*', ['controller' => 'categories', 'action' => 'edit']);
    $routes->connect('/categorieën/delete/*', ['controller' => 'categories', 'action' => 'delete']);


    // Vacatures
    $routes->connect('/vacatures', ['controller' => 'vacancies', 'action' => 'index']);
    $routes->connect('/vacatures/view/*', ['controller' => 'vacancies', 'action' => 'view']);
    $routes->connect('/vacatures/create', ['controller' => 'vacancies', 'action' => 'create']);
    $routes->connect('/vacatures/edit/*', ['controller' => 'vacancies', 'action' => 'edit']);
    $routes->connect('/vacatures/delete/*', ['controller' => 'vacancies', 'action' => 'delete']);

    // Competenties
    $routes->connect('/competenties', ['controller' => 'competences', 'action' => 'index']);
    $routes->connect('/competenties/view/*', ['controller' => 'competences', 'action' => 'view']);
    $routes->connect('/competenties/create', ['controller' => 'competences', 'action' => 'create']);
    $routes->connect('/competenties/edit/*', ['controller' => 'competences', 'action' => 'edit']);
    $routes->connect('/competenties/delete/*', ['controller' => 'competences', 'action' => 'delete']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
