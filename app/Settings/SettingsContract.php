<?php

namespace App\Settings;

interface SettingsContract
{
    /**
     * Get setting by key
     *
     * @param $key
     * @return null
     */
    public function get($key);

    /**
     * Store setting
     *
     * @param $key
     * @param $value
     * @return null
     */
    public function set($key, $value);

    /**
     * Check setting
     *
     * @param $key
     * @return boolean
     */
    public function has($key);
}