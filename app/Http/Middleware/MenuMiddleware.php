<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use App\Models\Place;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $menu_map = [
            'request.add_place' => 'Создать место',
            'request.add_any_photo' => 'Добавить фотографию к месту',
            'show.place_list' => 'Все места',
        ];

        $menu_templates = [
            'inactive_item' => "<div class=\"mitem\" onclick=\"document.location.href='#href#'; return false;\"><span><a href=\"#href#\" class=\"latent\">#label#</a></span></div>",
            'active_item' => '<div class="mitem active"><span>#label#</span></div>',
        ];

        $menu = [];

        $route_name = $request->route()->getName();
        //dump($route_name);
        foreach ($menu_map as $route => $label) {
            $template = ($route_name == $route) ? $menu_templates['active_item'] : $menu_templates['inactive_item'];
            switch ($route_name) {
                case 'request.add_photo':
                    if ($route == 'request.add_any_photo') {
                        $template = $menu_templates['active_item'];
                    }
                case 'show.place':
                    if ($route == 'request.add_any_photo') {
                        $name = urldecode($request->id);
                        $route = 'request.add_photo';
                        $menu[] = preg_replace(array("/#href#/", "/#label#/"), array(route($route, [$name]), $label), $template);
                        break;
                    }
                default:
                    $menu[] = preg_replace(array("/#href#/", "/#label#/"), array(route($route), $label), $template);
            }

        }

        $response = $next($request);
        $content = preg_replace("/#menu#/", join("\n", $menu), $response->getContent());
        $response->setContent($content);

        return $response;
    }
}
