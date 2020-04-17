<?php

class Subject implements SplSubject
{
    private $observers = [];

    /**
     * Ajoute un obvervateur au sujet.
     */
    public function attach(SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * Supprimer un observateur au sujet.
     */
    public function detach(SplObserver $observer)
    {
        foreach ($this->observers as $key => $value) {
            if ($value == $observer) {
                unset($this->observers[$key]);

                return;
            }
        }
    }

    /**
     * Appel la méthode "update" de tous les sujets.
     */
    public function notify()
    {
        foreach ($this->observers as $key => $value) {
            $value->update($this);
        }
    }
}
