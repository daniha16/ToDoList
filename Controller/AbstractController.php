<?php
/*
 * @author Rebeca Martinez Garcia <r.martinezgr@gmail.com>
 */

include_once "ActionInterface.php";

/**
 * Get controller class
 */
abstract class AbstractController implements ActionInterface
{
    const HTTP_METHOD = null;

    /**
     * @return array
     */
    abstract function execute(): array;

    /**
     * @return string
     */
    public function getResponse(): string {
        $result = [];
        if ($this->canExecute()) {
            $result = $this->execute();
        }
        return json_encode($result);
    }

    /**
     * @return bool
     */
    protected function canExecute(): bool {
        return static::HTTP_METHOD === $_SERVER['REQUEST_METHOD'];
    }
}
