package Managers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import Entities.NewsArticle;
import Entities.SystemUser;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

public class SystemUserDAOImp<T> implements SystemUserDAO<T> {
        
    private static final String PERSISTENCE_UNIT_NAME = "Chowers_SitePU";
    private static EntityManagerFactory factory;
    private static EntityManager em ;
    public SystemUserDAOImp()
    {
        factory = Persistence.createEntityManagerFactory(PERSISTENCE_UNIT_NAME);
        em = factory.createEntityManager();
    }

    @Override
    public void add(T entityClass) 
    {      
         em.getTransaction().begin(); 
         em.persist(entityClass);
         em.getTransaction().commit();
         em.close();
    }
    
    @Override
    public void update(T entityClass) {
         em.getTransaction().begin(); 
         em.persist(entityClass);
         em.getTransaction().commit();
         em.close();
    }

    @Override
    public void delete(T entityClass) {
        
         em.getTransaction().begin(); 
         em.remove(entityClass);
         em.getTransaction().commit();
         em.close();
       
    }

    @Override
    public SystemUser getUser(String username) {
        em.getTransaction().begin(); 
        
        int challengeNum = 0;
        
        List<SystemUser> list = em.createQuery("SELECT u  FROM SystemUser u", SystemUser.class).getResultList();
        
        em.getTransaction().commit();
        
        for(int i = 0; i < list.size(); i++)
        {   
            if(username.equals(list.get(i).getUserName()))
                     challengeNum = list.get(i).getSystemUserID();
        }
              
        SystemUser item = em.find(SystemUser.class, challengeNum);

        return item;
    }
    
    @Override
    public List<SystemUser> getAllUsers() {
        
        em.getTransaction().begin(); 

        List<SystemUser> list = em.createQuery("SELECT u  FROM SystemUser u", SystemUser.class).getResultList();
        em.getTransaction().commit();
        em.close();
         
        return list;
    }
    
  
    @Override
    public List<NewsArticle> getAllArticles() {
        
        em.getTransaction().begin(); 

        List<NewsArticle> list = em.createQuery("SELECT a  FROM NewsArticle a", NewsArticle.class).getResultList();
        em.getTransaction().commit();
        em.close();
         
        return list;
    }

}
