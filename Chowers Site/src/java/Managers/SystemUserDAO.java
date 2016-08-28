package Managers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import Entities.NewsArticle;
import Entities.SystemUser;
import java.util.List;

public interface SystemUserDAO<T> {
    public void add(T entityClass);
    public void update(T entityClass);
    public void delete(T entityClass);
    public SystemUser getUser(String username);
    
    public List<SystemUser> getAllUsers();
    public List<NewsArticle> getAllArticles();

}