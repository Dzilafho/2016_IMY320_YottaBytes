package Entities;

import java.io.Serializable;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.xml.bind.annotation.XmlRootElement;

@Entity
@XmlRootElement
public class SystemUser implements Serializable
{
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private int systemUserID;
    
   private String firstName;
   private String lastName;
   private String userName;
   private String emailAddress;
   private String password;
   private String accessLevel;

   /**
     * Constructor which takes in all member variables of the class
     */
   public SystemUser(String firstName, String lastName, String userName, String emailAddress, String password, String accessLevel) {
       this.firstName = firstName;
       this.lastName = lastName;
       this.userName = userName;
       this.emailAddress = emailAddress;
       this.password = password;
       this.accessLevel = accessLevel;
   }
   
   public SystemUser()
   {
       
   }
    /**
     * @return the systemUserID
     */
    public int getSystemUserID() {
        return systemUserID;
    }

    /**
     * @param systemUserID the systemUserID to set
     */
    public void setSystemUserID(int systemUserID) {
        this.systemUserID = systemUserID;
    }

    /**
     * @return the firstName
     */
    public String getFirstName() {
        return firstName;
    }

    /**
     * @param firstName the firstName to set
     */
    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    /**
     * @return the lastName
     */
    public String getLastName() {
        return lastName;
    }

    /**
     * @param lastName the lastName to set
     */
    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    /**
     * @return the userName
     */
    public String getUserName() {
        return userName;
    }

    /**
     * @param userName the userName to set
     */
    public void setUserName(String userName) {
        this.userName = userName;
    }

    /**
     * @return the emailAddress
     */
    public String getEmailAddress() {
        return emailAddress;
    }

    /**
     * @param emailAddress the emailAddress to set
     */
    public void setEmailAddress(String emailAddress) {
        this.emailAddress = emailAddress;
    }

    /**
     * @return the password
     */
    public String getPassword() {
        return password;
    }

    /**
     * @param password the password to set
     */
    public void setPassword(String password) {
        this.password = password;
    }

    /**
     * @return the accessLevel
     */
    public String getAccessLevel() {
        return accessLevel;
    }

    /**
     * @param accessLevel the accessLevel to set
     */
    public void setAccessLevel(String accessLevel) {
        this.accessLevel = accessLevel;
    }
}
