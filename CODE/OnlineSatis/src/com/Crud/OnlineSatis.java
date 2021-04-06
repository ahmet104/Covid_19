/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.postgresqltutorial;

import java.sql.SQLException;
import java.util.ArrayList;

/**
 *
 * @author Mlukeluk
 */
public class OnlineSatis {

    
     public static void main(String[] args)throws SQLException{
         App app = new App();
         app.getMusteri();
         System.out.println("___________________________");
                ArrayList<Musteri> musteriList = new ArrayList();

                musteriList.add(new Musteri(2, "malik", "kassum ", "030203023"));
                app.insertMusteri(musteriList);
               

    }
    
}
