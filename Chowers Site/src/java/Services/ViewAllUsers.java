package Services;

import Managers.SystemUserDAOImp;
import Entities.SystemUser;
import Managers.SystemUserDAO;
import java.util.*;

import javax.ws.rs.*;
import javax.ws.rs.core.*;


 
 
@Path("/viewUsers")
public class ViewAllUsers {
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public  Response getUsers()   
    {
        SystemUserDAO manager = new SystemUserDAOImp();
        List<SystemUser> result = manager.getAllUsers();
        
       
             
        return Response.ok().entity(new GenericEntity<List<SystemUser>>(result){})
        .header("Access-Control-Allow-Origin", "*")
        .header("Access-Control-Allow-Methods", "GET, POST, OPTIONS, HEAD")
        .build();
        
    }
                
} 