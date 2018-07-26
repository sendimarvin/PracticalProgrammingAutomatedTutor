/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bt_in_class_autograder;

import java.util.ArrayList;

/**
 *
 * @author Aiko
 */
public class ApplicationManager {
    
    private static ArrayList<Question> questions;
    private static int qnId;
    
    public int getQuestionId(){
    
        return qnId;
    
    }
    
    public void setQuestionId(int id){
    
        qnId = id;
    
    }
    
    public static void setQuestions(ArrayList<Question> questions){
    
        ApplicationManager.questions = questions;
    
    }
    
    public static ArrayList<Question> getQuestions(){
    
        return ApplicationManager.questions;
    
    }
    
}
