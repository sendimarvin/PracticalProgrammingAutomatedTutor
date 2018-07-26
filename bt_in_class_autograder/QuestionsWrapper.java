/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bt_in_class_autograder;


/**
 *
 * @author Aiko
 */
import java.io.File;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

import org.jdom2.Element;
import org.jdom2.input.DOMBuilder;
import org.w3c.dom.Document;
import org.xml.sax.SAXException;


public class QuestionsWrapper {

    public static void setQns(String fileName) {

        org.jdom2.Document jdomDoc;
        
        try {
            //we can create JDOM Document from DOM, SAX and STAX Parser Builder classes
            jdomDoc = useDOMParser(fileName);
            Element root = jdomDoc.getRootElement();
            List<Element> qnListElements = root.getChildren("question");
            ArrayList<Question> qns = new ArrayList<>();
            for (Element qnElement : qnListElements) {
                Question qn = new Question();
                int type = Integer.parseInt(qnElement.getChildText("type"));
                
                switch(type){
                
                    case 1:
                        qn.setQuestion(qnElement.getChildText("qn"));
                        qn.setType(1);
                        break;
                        
                    case 2:
                        qn.setQuestion(qnElement.getChildText("qn"));
                        qn.setType(2);
                        break;
                        
                    case 3:
                        qn.setQuestion(qnElement.getChildText("qn"));
                        qn.setType(3);
                        qn.setSolution(qnElement.getChildText("sol"));
                        
                        
                        List<Element> qnOptElements = qnElement.getChild("opts").getChildren("opt");
                        ArrayList<String> options = new ArrayList();
                        for (Element qnOptElement : qnOptElements) {
                        
                            options.add(qnOptElement.getText());
                        
                        }
                        
                        
                        qn.setOptions(qnElement.getChildText(""), fileName, fileName, fileName, fileName, fileName);
                        String f = "F. ";
                        String e = "E. ";
                        switch(options.size()){
                        
                            case 5:
                                e = options.get(4);
                                break;
                                
                            case 6:
                                e = options.get(4);
                                f = options.get(5);
                                break;
                        
                        }
                        
                        qn.setOptions(options.get(0), options.get(1), options.get(2), options.get(3), e, f);

                        break;
                
                }
                
                qns.add(qn);
                
            }
            
            ApplicationManager.setQuestions(qns);
            
        } catch (Exception e) {
            e.printStackTrace();
        }

    }


    //Get JDOM document from DOM Parser
    private static org.jdom2.Document useDOMParser(String fileName)
            throws ParserConfigurationException, SAXException, IOException {
        //creating DOM Document
        DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder dBuilder;
        dBuilder = dbFactory.newDocumentBuilder();
        Document doc = dBuilder.parse(new File(fileName));
        DOMBuilder domBuilder = new DOMBuilder();
        return domBuilder.build(doc);

    }
}
