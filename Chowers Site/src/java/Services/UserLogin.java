package Services;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


import Managers.SystemUserDAO;
import Managers.SystemUserDAOImp;
import java.net.URI;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.FormParam;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

/**
 * REST Web Service
 *
 * @author gershom
 */
@Path("/userLogin")
public class UserLogin {

   
    /**
     * Creates a new instance of LoginResource
     */
    public UserLogin() {
    }

    /**
     * Retrieves representation of an instance of services.Login
     * @param uriInfo
     * @param username
     * @param thePassword
     * @return an instance of java.lang.String
     */
    @POST
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces("text/html")
    public Response LoginValidation(@Context UriInfo uriInfo,@FormParam("username") String username,@FormParam("password") String thePassword) {
      
        SystemUserDAO manager = new SystemUserDAOImp();
        
        if(manager.getUser(username) != null && username.equals(manager.getUser(username).getUserName()))
        {
                URI uri=uriInfo.getBaseUriBuilder().path("../index.html").build();

                if(thePassword.equals(manager.getUser(username).getPassword()))
                {      
                        if("Admin".equals(manager.getUser(username).getAccessLevel()))
                        {
                                uri=uriInfo.getBaseUriBuilder().path("../viewWriteItems.html").build();
                        }
                        else
                        {
                                uri=uriInfo.getBaseUriBuilder().path("../viewItems.html").build();
                        }
                        
                        return Response.seeOther(uri).build();
                 }
                
                return Response.seeOther(uri).build();
        }
        else
        {
                URI uri=uriInfo.getBaseUriBuilder().path("../index.html").build();
                return Response.seeOther(uri).build(); 
        }

     }
}
