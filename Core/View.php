<?php

namespace Core;


/**
 * Класс для управления представлениями
 * Class View
 * @package App\Core
 */
class View
{
    protected $data = [];
    protected $prefix;
    protected $suffix;

    public function __construct(string $prefix, string $suffix)
    {
        $this->prefix = $prefix;
        $this->suffix = $suffix;
    }

    function __get($name)
    {
        return $this->data[$name];
    }

    function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * Функция для рендеринга шаблонов
     * @param string $viewName - Файл шаблона
     * @return string - Сформированное тело шаблона
     * @throws \Exception
     */
    public function render(string $viewName): string
    {
        $fileName = realpath($this->prefix . $viewName . $this->suffix);

        if (is_dir($fileName) || !file_exists($fileName)) {
            throw new \Exception('View file ' . $fileName . ' does not exist');
        }

        extract($this->data);

        ob_start();
        include $fileName;
        return ob_get_clean();
    }

    /**
     * Метод сборки страницы
     * @param string $layout - Макет
     * @param array $parts - Фрагменты
     */
    public function renderTemplate(string $layout, array $parts)
    {
        foreach ($parts as $key => $viewName) {
            $this->$key = $this->render($viewName);
        }

        echo $this->render($layout);
    }

}