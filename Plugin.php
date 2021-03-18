<?php
/*
 * Copyright 2021 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Mibew\Mibew\Plugin\BigCloseButton;

use Mibew\EventDispatcher\EventDispatcher;
use Mibew\EventDispatcher\Events;

/**
 * Provides an ability to automatically invite a visitor into chat.
 */
class Plugin extends \Mibew\Plugin\AbstractPlugin implements \Mibew\Plugin\PluginInterface
{
    protected $initialized = true;

    // Button operating mode (close stands for closing chat box and end the chat, dismiss stands for closing chat box solely)
    protected $operation_mode = 'close';

    /**
     * Class constructor.
     *
     * @param array $config List of the plugin config.
     *
     */
    public function __construct($config)
    {
        if (isset($config['operation_mode']) && ($config['operation_mode'] == 'dismiss')) {
            $this->operation_mode = $config['operation_mode'];
        }
    }

    /**
     * Defines necessary event listeners.
     */
    public function run()
    {
        $dispatcher = EventDispatcher::getInstance();
        $dispatcher->attachListener(Events::PAGE_ADD_JS, $this, 'addJs');
        $dispatcher->attachListener(Events::PAGE_ADD_CSS, $this, 'addCss');
    }

    /**
     * Adds custom JS file to the page.
     *
     * @see \Mibew\EventDispatcher\Events::PAGE_ADD_JS
     */
    public function addJs(&$args)
    {
        if (preg_match('/^\/chat(\/\d{1,10}\/\d{1,10})?$/', $args['request']->getPathInfo())) {
            $args['js'][] = $this->getFilesPath() . '/js/' . $this->operation_mode . '.js';
            $args['js'][] = $this->getFilesPath() . '/js/big_close_button.js';
        }
    }

    /**
     * Adds custom CSS file to the page.
     *
     * @see \Mibew\EventDispatcher\Events::PAGE_ADD_CSS
     */
    public function addCss(&$args)
    {
        if (preg_match('/^\/chat(\/\d{1,10}\/\d{1,10})?$/', $args['request']->getPathInfo())) {
            $args['css'][] = $this->getFilesPath() . '/css/big_close_button.css';
        }
    }

    /**
     * Returns verision of the plugin.
     *
     * @return string Plugin's version.
     */
    public static function getVersion()
    {
        return '0.0.1';
    }
}
