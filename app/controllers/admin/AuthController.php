<?php
namespace App\Controllers\Admin;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class AuthController extends BaseController {

  /**
     * ÏʾµÇ¼ҳÃ
        * @return View
	   */
	     public function getLogin()
	       {
	           return View::make('admin.auth.login');
		     }

		       /**
		          * POST µÇ¼Ñ֤
			     * @return Redirect
			        */
	     public function postLogin()
	    {
	        $credentials = array(
		        'email'    => Input::get('email'),
	               'password' => Input::get('password')
		      );

	    try
	        {
		      $user = Sentry::authenticate($credentials, false);

	            if ($user)
	        	  {
		          return Redirect::route('admin.pages.index');
	 	        }
		 }
	     catch(\Exception $e)
		    {
			      return Redirect::route('admin.login')->withErrors(array('login' => $e->getMessage()));
		      }
														        }

															  /**
	 * עÏ
         * @return Redirect
	 */
	
	public function getLogout()
	    {
	           Sentry::logout();
	           return Redirect::route('admin.login');
	     }

}
