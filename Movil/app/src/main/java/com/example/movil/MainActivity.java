package com.example.movil;

import android.os.Bundle;
import android.util.Log;

import androidx.appcompat.app.AppCompatActivity;

import com.example.movil.io.ArticuloApiAdapter;
import com.example.movil.model.Article;

import java.util.ArrayList;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity implements Callback<ArrayList<Article>> {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);



        Call<ArrayList<Article>> call = ArticuloApiAdapter.getApiService().getArticulo();
        call.enqueue(this);
        setContentView(R.layout.activity_main);
    }

    @Override
    public void onResponse(Call<ArrayList<Article>> call, Response<ArrayList<Article>> response) {
        if(response.isSuccessful()){
            ArrayList<Article> articles = response.body();
            Log.d("onResponse articles", "Size of articles =>" + articles.size());
        }
    }

    @Override
    public void onFailure(Call<ArrayList<Article>> call, Throwable t) {

    }
}