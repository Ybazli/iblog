<?php


namespace App\Http\Controllers\Traids;


trait Messageable
{
    /**
     * Return create successfully message.
     *
     * @param string $model
     * @return array
     */
    public function createMessage($model)
    {
        return $this->message($model , 'create');
    }

    /**
     * Return updated successfully message.
     *
     * @param string $model
     * @return array
     */
    public function updateMessage($model)
    {
        return $this->message($model , 'update');
    }


    /**
     * Return Delete successfully message.
     *
     * @param string $model
     * @return array
     */
    public function deleteMessage($model)
    {
        return $this->message($model , 'delete');
    }

    /**
     * @param string $model
     * @param string $job
     * @return array mixed
     */
    private function message($model , $job)
    {
        return [
            'message' => "The {$model} was {$job}d successfully."
            ];
    }


}