<?php

namespace doode\FormBuilder\Middlewares;

use Closure;
use doode\FormBuilder\Models\Form;

class PublicFormAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $identifier = $request->route('identifier');

        $form = Form::where('identifier', $identifier)->firstOrFail();

        if ($form->isPrivate()) {
            // the user must be authenticated
            if (! auth()->check()) {
                return redirect()
                    ->route('login')
                    ->with('error', "Form '{$form->name}' requires you to login before you can access it.");
            }
        }

        return $next($request);
    }
}
