package com.example.vicdo.retrofitapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.TextView;

import com.example.vicdo.retrofitapp.Model.Ip;
import com.example.vicdo.retrofitapp.Model.User;
import com.example.vicdo.retrofitapp.Remote.IpService;
import com.example.vicdo.retrofitapp.Remote.UserService;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {

    IpService ipService;
    UserService userService;
    TextView txtUser;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        ipService = Common.getIpService();
        userService = Common.getUserService();
        txtUser = (TextView)findViewById(R.id.txtUser);

        getUser();
    }

    private void getIp() {
        ipService.getIp().enqueue(new Callback<Ip>() {
            @Override
            public void onResponse(Call<Ip> call, Response<Ip> response) {
                txtUser.setText(response.body().toString());
            }

            @Override
            public void onFailure(Call<Ip> call, Throwable t) {
                Log.e("Error", t.getMessage());
            }
        });
    }

    private void getUser() {
        userService.getUser().enqueue(new Callback<User>() {
            @Override
            public void onResponse(Call<User> call, Response<User> response) {
                txtUser.setText(response.body().toString());
            }

            @Override
            public void onFailure(Call<User> call, Throwable t) {
                Log.e("Error", t.getMessage());
            }
        });
    }
}
