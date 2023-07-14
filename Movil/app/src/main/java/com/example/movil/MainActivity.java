package com.example.movil;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.SearchView;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Toast;

import com.example.movil.adapter.RecyclerAdapter;
import com.example.movil.model.Article;
import com.example.movil.retrofit_data.RetrofitApiService;
import com.example.movil.retrofit_data.RetrofitClient;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity implements RecyclerAdapter.RecyclerItemClick, SearchView.OnQueryTextListener {
    private RecyclerView rvLista;
    private SearchView svSearch;
    private RecyclerAdapter adapter;
    private List<Article> items;

    private RetrofitApiService retrofitApiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        initViews();
        initValues();
        initListener();
    }

    private void initViews(){
        rvLista = findViewById(R.id.rvLista);
        svSearch = findViewById(R.id.svShearch);
    }

    private void initValues(){
        retrofitApiService = RetrofitClient.getApiService();

        LinearLayoutManager manager = new LinearLayoutManager(this);
        rvLista.setLayoutManager(manager);

        getItemsSQL();
    }

    private void initListener(){
        svSearch.setOnQueryTextListener(this);

    }

   /* private List<Article> getItems(){
        List<Article> articles = new ArrayList<>();
        articles.add(new Article(1, "remera", "002", "nuevo deprimeracaliddad de uno hohjkj njhguu khggyj gghhgf ", R.drawable.remera1));
        articles.add(new Article(2, "remera", "0025", "usado", R.drawable.remera2));
        articles.add(new Article(3, "pantalon", "003", "nuevo", R.drawable.pantalon));
        articles.add(new Article(2, "remera", "0025", "usado", R.drawable.remera2));
        articles.add(new Article(3, "pantalon", "003", "nuevo", R.drawable.pantalon));
        articles.add(new Article(2, "remera", "0025", "usado", R.drawable.remera2));
        articles.add(new Article(3, "pantalon", "003", "nuevo", R.drawable.pantalon));
        articles.add(new Article(3, "celular", "003", "nuevo", R.drawable.celular));

        return articles;
    }*/

    private void getItemsSQL(){
        retrofitApiService.getItemsDB().enqueue(new Callback<List<Article>>() {
            @Override
            public void onResponse(Call<List<Article>> call, Response<List<Article>> response) {

                items = response.body();
                adapter = new RecyclerAdapter(items, MainActivity.this);
                rvLista.setAdapter(adapter);
            }

            @Override
            public void onFailure(Call<List<Article>> call, Throwable t) {
                Toast.makeText(MainActivity.this, "Error: "+ t.getMessage(), Toast.LENGTH_LONG).show();
            }
        });
    }

    @Override
    public void itemClick(Article item) {
        Intent intent = new Intent(this, Información.class);
        intent.putExtra("itemDetail", item);
        startActivity(intent);
    }

    @Override
    public boolean onQueryTextSubmit(String query) {
        return false;
    }

    @Override
    public boolean onQueryTextChange(String newText) {
        adapter.filter(newText);
        return true;
    }
}