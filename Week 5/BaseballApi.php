<?
//if BaseballApi Class were inaccessible, we'd need to mock the object. 
class BaseballApi
{
    public function submitAtBat($playerid,$result)
    {
		        
    	//insert at bat in database
        return true;
    }


    public function showAllStats($playerid)
    {
    	//if this were an in accessible external api we could also mock
    	//select updated batting average
    }


}
 
?>