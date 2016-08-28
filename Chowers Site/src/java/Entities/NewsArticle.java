package Entities;


import java.io.Serializable;
import java.util.List;
import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.xml.bind.annotation.XmlRootElement;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author dZiLafho
 */

@Entity
@XmlRootElement
public class NewsArticle implements Serializable{
    
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private int articleID;
   
    private String articleName;
    private String articleHeadline;
    private String articleStory;

    /**
     * @return the articleID
     */
    public int getArticleID() {
        return articleID;
    }

    /**
     * @param articleID the articleID to set
     */
    public void setArticleID(int articleID) {
        this.articleID = articleID;
    }

    /**
     * @return the articleName
     */
    public String getArticleName() {
        return articleName;
    }

    /**
     * @param articleName the articleName to set
     */
    public void setArticleName(String articleName) {
        this.articleName = articleName;
    }

    /**
     * @return the articleHeadline
     */
    public String getArticleHeadline() {
        return articleHeadline;
    }

    /**
     * @param articleHeadline the articleHeadline to set
     */
    public void setArticleHeadline(String articleHeadline) {
        this.articleHeadline = articleHeadline;
    }

    /**
     * @return the articleStory
     */
    public String getArticleStory() {
        return articleStory;
    }

    /**
     * @param articleStory the articleStory to set
     */
    public void setArticleStory(String articleStory) {
        this.articleStory = articleStory;
    }
   
}
