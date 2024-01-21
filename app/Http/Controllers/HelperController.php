<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function Positive(string $routeNames, $params = [])
    {
        return redirect()->route($routeNames, $params)->with('messageP', 'Table updated successfully.');
    }

    public function Warning(string $routeNames, $params = [])
    {
        return redirect()->route($routeNames, $params)->with('messageW', 'Table has no data changes. If there is an error, please contact customer support.');
    }

    public function Negative(string $routeNames, $params = [])
    {
        return redirect()->route($routeNames, $params)->with('messageN', 'There is an error while trying to make changes to the table. Refresh this page, or wait for a while.');
    }
}
