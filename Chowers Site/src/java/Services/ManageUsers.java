package Services;

import Managers.SystemUserDAOImp;
import Entities.SystemUser;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.PathParam;
import javax.ws.rs.Consumes;
import javax.ws.rs.FormParam;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.POST;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

 
 
@Path("/User")
public class ManageUsers {
   
             SystemUserDAOImp dao=new SystemUserDAOImp<>();

    
    @POST
    @Path("/addUser")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    public void addUser(@Context    @FormParam("name") String fName, 
                                                        @FormParam("surname") String lName,
                                                        @FormParam("username") String userName, 
                                                        @FormParam("password") String passWord,
                                                        @FormParam("email") String email,
                                                        @FormParam("userType") String accessLevel) 
    {
        
         SystemUser user=new SystemUser(fName, lName, userName, email, passWord, accessLevel);
         dao.add(user);        
    }
   
    @POST
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Path("/removeUser")
    public void removeUser(@Context    @FormParam("name") String fName) 
    {
        
         dao.delete(fName);
    }
    
    @GET
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Path("/getUsers")
    @Produces(MediaType.APPLICATION_JSON)
    public String getUsers() 
    {
        
         dao.getAllUsers();
         
         return "YYYYYYYYYYYY";
    }
} 