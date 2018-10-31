package com.example.vicdo.retrofitapp.Remote;

import com.example.vicdo.retrofitapp.Model.User;

import retrofit2.Call;
import retrofit2.http.GET;

public interface UserService {
    @GET("/")
    Call<User> getUser();
}
