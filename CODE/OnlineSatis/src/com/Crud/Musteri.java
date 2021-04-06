/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.postgresqltutorial;

/**
 *
 * @author Mlukeluk
 */
public class Musteri {
    private int m_id;
    private String m_adi;
    private String m_soyadi;
    private String m_tel;

    public Musteri() {
    }

    public Musteri(int m_id, String m_adi, String m_soyadi, String m_tel) {
        this.m_id = m_id;
        this.m_adi = m_adi;
        this.m_soyadi = m_soyadi;
        this.m_tel = m_tel;
    }

    public int getM_id() {
        return m_id;
    }

    public void setM_id(int m_id) {
        this.m_id = m_id;
    }

    public String getM_adi() {
        return m_adi;
    }

    public void setM_adi(String m_adi) {
        this.m_adi = m_adi;
    }

    public String getM_soyadi() {
        return m_soyadi;
    }

    public void setM_soyadi(String m_soyadi) {
        this.m_soyadi = m_soyadi;
    }

    public String getM_tel() {
        return m_tel;
    }

    public void setM_tel(String m_tel) {
        this.m_tel = m_tel;
    }
  
}
