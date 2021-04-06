/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.postgresqltutorial;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.List;

/**
 *
 * @author Mlukeluk
 */
public class App {
    private final String url = "jdbc:postgresql://localhost/Online Satis";
    private final String user = "postgres";
    private final String password = "mlukeluk";

    public Connection connect() throws SQLException {
        return DriverManager.getConnection(url, user, password);
    }
     public void insertMusteri(List<Musteri> list) {
        getMusteri();
        String SQL = "INSERT INTO musteri(m_id,m_ad,m_soyad,m_tel)VALUES(?,?,?,?)";
        try (
                Connection conn = connect();
                PreparedStatement statement = conn.prepareStatement(SQL);) {
            int count = 0;

            for (Musteri musteri : list) {
                statement.setInt(1, musteri.getM_id());      
                statement.setString(2, musteri.getM_adi());
                statement.setString(3, musteri.getM_soyadi());
                statement.setString(4, musteri.getM_tel());

                statement.addBatch();
                count++;
                if (count % 100 == 0 || count == list.size()) {
                    statement.executeBatch();
                }
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        getMusteri();
    }
     
     public void getMusteri() {
        System.out.println("");
        String SQL = "SELECT *FROM musteri";

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(SQL)) {

            displayMusteri(rs);

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
     private void displayMusteri(ResultSet rs) throws SQLException {
        while (rs.next()) {
            System.out.println(rs.getInt("m_id") + "\t"
                  
                    + rs.getString("m_ad") + "\t"
                    + rs.getString("m_soyad") + "\t"
                 
                    + rs.getString("m_tel") + "\t"
            );

        }
    }
     public int deleteOyuncu(int formano) {
        String SQL = "DELETE FROM oyuncu WHERE o_formano = ?";
        getMusteri();
        int affectedrows = 0;

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(SQL)) {

            pstmt.setInt(1, formano);

            affectedrows = pstmt.executeUpdate();

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

        getMusteri();
        return affectedrows;
    }
      public int updateTakim(int t_id, String t_adi) {
        String SQL = "UPDATE takim "
                + "SET t_adi = ?"
                + "WHERE t_id = ?";

        int affectedrows = 0;

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(SQL)) {

            pstmt.setString(1, t_adi);

            pstmt.setInt(2, t_id);

            affectedrows = pstmt.executeUpdate();

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        getMusteri();
        return affectedrows;
    }
}
