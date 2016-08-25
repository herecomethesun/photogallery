<?php

namespace App\Settings;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Filesystem\Filesystem;

class Settings implements SettingsContract
{
    /**
     * @var Collection
     */
    private $settings;

    /**
     * @var
     */
    private $file;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
        $this->settings = collect([]);
    }

    /**
     * Load settings from file
     *
     * @param $file
     */
    public function load($file)
    {
        $this->file = $file;

        if (!$this->filesystem->exists($this->file)) {
            $this->filesystem->put($this->file, $this->json());
        }

        $this->settings = collect(json_decode($this->filesystem->get($this->file)));
    }

    /**
     * Store settings
     */
    public function store()
    {
        $this->filesystem->put(
            $this->file,
            $this->json()
        );
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if ($this->settings->has($key)) {
            return $this->settings->get($key);
        }

        return null;
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->settings->put($key, $value);

        $this->store();
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return $this->settings->has($key);
    }

    /**
     * @return string
     */
    protected function json()
    {
        return $this->settings->toJson();
    }
}