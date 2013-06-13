<?php

/*
 * render templates provided by plugins
 */
$app->get('/plugins/:plugin/:template', function ($plugin_id, $template) use ($app) {

    if (PluginQuery::create()->isInstalled($plugin_id)) {
        if (file_exists(ROOT_PATH . 'templates/plugins/' . $plugin_id . '/' . $template)) {
            $app->render('plugins/' . $plugin_id . '/' . $template, array());
            return;
        }
    }
    $app->notFound();
});
