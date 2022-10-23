<?php


namespace App\Services\Consume;


/**
 *
 */
class ConsumeServices
{

    /**
     * @param $message
     * @return array
     */
    protected function error($message){
        return [
            'consumeError' => true,
            'message' => $message
        ];
    }

    /**
     * @param $data
     * @param $message
     * @return array
     */
    protected function response($data, $message){
        return [
            'consumeError' => false,
            'data' => $data,
            'message' => $message
        ];
    }
}
