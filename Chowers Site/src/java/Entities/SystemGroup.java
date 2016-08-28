package Entities;


import java.io.Serializable;
import java.util.List;
import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
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
public class SystemGroup implements Serializable{
    
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private int groupID;
    
     @OneToMany( targetEntity=SystemUser.class, cascade = CascadeType.PERSIST)
    private List<SystemUser> groupMembers;

   private String groupName;

    /**
     * @return the groupID
     */
    public int getGroupID() {
        return groupID;
    }

    /**
     * @param groupID the groupID to set
     */
    public void setGroupID(int groupID) {
        this.groupID = groupID;
    }

    /**
     * @return the groupMembers
     */
    public List<SystemUser> getGroupMembers() {
        return groupMembers;
    }

    /**
     * @param groupMembers the groupMembers to set
     */
    public void setGroupMembers(List<SystemUser> groupMembers) {
        this.groupMembers = groupMembers;
    }

    
    /**
     * @param groupMember the groupMember to add
     */
    public void addGroupMember(SystemUser groupMember) {
        this.groupMembers.add(groupMember);
    }
    /**
     * @return the groupName
     */
    public String getGroupName() {
        return groupName;
    }

    /**
     * @param groupName the groupName to set
     */
    public void setGroupName(String groupName) {
        this.groupName = groupName;
    }
}
