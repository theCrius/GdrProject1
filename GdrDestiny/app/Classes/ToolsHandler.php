<?php

namespace App\Classes;
use Illuminate\Http\Request;

trait ToolsHandler
{
    private $all_tools;
    private $user;
    function getTools(Request $request)
    {
        $this->user = $request->user();
        $this->all_tools = \Config::get('gdrConsts.chat.tools');
        return $this->checkIfUserCanGetTool();
    }

    function checkIfUserCanGetTool()
    {
        $listOfTools = [];
        foreach($this->all_tools as  $nameTool => $roleTool )
        {
            if($roleTool == '*') 
            {
                if( $this->user->classes->where('name','Dottore')->first() )  $listOfTools[] = $nameTool;
 
                continue; 
            }
            if( $this->user->hasRole(null,$roleTool) ) $listOfTools[] = $nameTool;
        }

        return $listOfTools;
    }
    

}
?>