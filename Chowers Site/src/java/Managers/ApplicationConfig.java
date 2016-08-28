package Managers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import Services.UserLogin;
import Services.ViewAllUsers;
import Services.ManageGroups;
import Services.ManageNewsArticles;
import Services.ManageUsers;
import java.util.Set;
import javax.ws.rs.core.Application;

/**
 *
 * @author dZiLafho
 */
@javax.ws.rs.ApplicationPath("REST")
public class ApplicationConfig extends Application {

    @Override
    public Set<Class<?>> getClasses() {
        Set<Class<?>> resources = new java.util.HashSet<>();
        addRestResourceClasses(resources);
        return resources;
    }

    /**
     * Do not modify addRestResourceClasses() method.
     * It is automatically populated with
     * all resources defined in the project.
     * If required, comment out calling this method in getClasses().
     */
    private void addRestResourceClasses(Set<Class<?>> resources) {
        resources.add(Services.ManageGroups.class);
        resources.add(Services.ManageNewsArticles.class);
        resources.add(Services.ManageUsers.class);
        resources.add(Services.UserLogin.class);
        resources.add(Services.ViewAllUsers.class);
    }
    
}
