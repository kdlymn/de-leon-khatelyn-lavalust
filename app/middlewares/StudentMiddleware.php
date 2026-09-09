<?php

$_SESSION['student_access'] = true;

class StudentMiddleware
{
	public function handle(Closure $next)
	{
		return $next();
	}
}
