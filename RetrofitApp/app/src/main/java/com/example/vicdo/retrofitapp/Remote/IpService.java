package com.example.vicdo.retrofitapp.Remote;

import com.example.vicdo.retrofitapp.Model.Ip;

import retrofit2.Call;
import retrofit2.http.GET;

public interface IpService {
    @GET("/")
    Call<Ip> getIp();
}
