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
public class Question {
    
    private String question, sampleCode, objSol, optA, optB, optC, optD, optE, optF;
    
    //type could be 1 for structured 2 for programming and 3 for objective
    private int type;
    
    public Question(){}
    
    public Question(String qn, int type){
    
        setQuestion(qn);
        setType(type);
    
    }
    
    public void setQuestion(String question){
    
        this.question = question;
    
    }
    
    public void setType(int type){
    
        this.type = type;
    
    }
    
    public String getQuestion(){
    
        return question;
    
    }
    
    public int getType(){
    
        return type;
    
    }
    
    public String getSampleCode(){
    
        return sampleCode;
    
    }
    
    public void setSampleCode(String sampleCode){
    
        this.sampleCode = sampleCode;
    
    }
    
    public void setOptions(String optA, String optB, String optC, String optD, String optE, String optF){
    
        this.optA = optA;
        this.optB = optB;
        this.optC = optC;
        this.optD = optD;
        
        if(!optE.equals("E. ")){
        
            this.optE = optE;
            
            if(!optF.equals("F. ")){
            
                this.optF = optF;
            
            }else{
            
                this.optF = "";
            
            }
        
        }else{
        
            this.optE = "";
            this.optF = "";
            
        }
    
    }
    
    public ArrayList<String> getOpts(){
    
        ArrayList<String> options = new ArrayList();
        options.add(optA);
        options.add(optB);
        options.add(optC);
        options.add(optD);
        
        if(!optE.isEmpty()){
        
            options.add(optE);
            
            if(!optF.isEmpty()){
            
                options.add(optF);
            
            }
        
        }
        
        return options;
    
    }
    
    public void setSolution(String objSol){
    
        this.objSol = objSol;
    
    }
    
    public String getSolution(){
    
        return objSol;
    
    }
    
    public String getXml(){
    
        String xml = "<question>";
        
        switch(type){
        
            case 1:
              
                xml = xml.concat("<qn>");
                xml = xml.concat(getQuestion());
                xml = xml.concat("</qn>");
        
                xml = xml.concat("<type>");
                xml = xml.concat(String.valueOf(getType()));
                xml = xml.concat("</type>");
         
                break;
                
            case 2:
                
                xml = xml.concat("<qn>");
                xml = xml.concat(getQuestion());
                xml = xml.concat("</qn>");
        
                xml = xml.concat("<type>");
                xml = xml.concat(String.valueOf(getType()));
                xml = xml.concat("</type>");
                
                break;
                
            case 3:
                
                xml = xml.concat("<qn>");
                xml = xml.concat(getQuestion());
                xml = xml.concat("</qn>");
        
                xml = xml.concat("<type>");
                xml = xml.concat(String.valueOf(getType()));
                xml = xml.concat("</type>");
        
                xml = xml.concat("<sol>");
                xml = xml.concat(getSolution());
                xml = xml.concat("</sol>");
        
                xml = xml.concat("<opts>");
                for(int i = 0; i < getOpts().size(); i++){
                    xml = xml.concat("<opt>");
                    xml = xml.concat(getOpts().get(i));
                    xml = xml.concat("</opt>");
                }
                xml = xml.concat("</opts>");
                
                break;
        
        }
        
        xml = xml.concat("</question>");
        
        return xml;
    
    }
    
}
