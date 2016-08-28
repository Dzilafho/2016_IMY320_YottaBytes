package Services;

import Managers.SystemUserDAOImp;
import Entities.SystemUser;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.PathParam;
import javax.ws.rs.Consumes;
import javax.ws.rs.FormParam;
import javax.ws.rs.Path;
import javax.ws.rs.POST;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

 
 
@Path("/Group")
public class ManageGroups {
   
    @POST
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.APPLICATION_JSON)
    @Path("/addGroup")
    public void addGroup(@Context    @FormParam("name") String fName, 
                                                        @FormParam("surname") String lName,
                                                        @FormParam("username") String userName, 
                                                        @FormParam("password") String passWord,
                                                        @FormParam("email") String email,
                                                        @FormParam("userType") String accessLevel) 
    {
        
         SystemUser user=new SystemUser(fName, lName, userName, email, passWord, accessLevel);
         SystemUserDAOImp dao=new SystemUserDAOImp<>();
         dao.add(user);        
    }
   
    @POST
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.APPLICATION_JSON)
    @Path("/removeGroup")
    public void removeGroup(@Context    @FormParam("name") String fName) 
    {
        
         SystemUserDAOImp dao=new SystemUserDAOImp<>();
         dao.delete(fName);
    }
} 