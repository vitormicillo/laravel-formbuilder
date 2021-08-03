<?php

namespace doode\FormBuilder\Events\Form;

use doode\FormBuilder\Models\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class FormUpdated
{
    use Queueable, SerializesModels;

    /**
     * The updated form
     *
     * @var doode\FormBuilder\Models\Form
     */
    public $form;

    /**
     * Create a new event instance.
     *
     * @param doode\FormBuilder\Models\Form $form
     * @return void
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }
}
