<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BreadcrumbsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $segments = $request->segments();
        $breadcrumbs = [];
        $url = '';
        $segmentLabels = [
            'admin' => 'Dashboard',
            'product-menu' => 'Product Menu',
            'article-menu' => 'Article Menu',
            'categories' => 'Categories',
            'users' => 'Users',
            'orders' => 'Orders',
        ];
        foreach ($segments as $segment) {
            $url .= '/' . $segment;
            if ($segment == 'admin') {
                $segment = 'Dashboard';
            }
            $label = $segmentLabels[$segment] ?? ucfirst($segment);
            $breadcrumbs[] = [
                'label' =>  $label,
                'url' => url($url),
            ];
        }
        view()->share('breadcrumbs', $breadcrumbs);

        return $next($request);
    }
}
