package com.example.movil;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.movil.model.Article;

public class MainActivity2 extends AppCompatActivity {
    private ImageView imgItemDetail;
    private TextView tvNombreDetail;
    private TextView tvDescripcionDetail;
    private Article itemDetail;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
        setTitle(getClass().getSimpleName());

        initViews();
        initValues();
    }
    public void initViews(){
        imgItemDetail = findViewById(R.id.imgItemDetail);
        tvNombreDetail = findViewById(R.id.tvNombreDetail);
        tvDescripcionDetail = findViewById(R.id.tvDescripcionDetail);
    }

    public void initValues(){
        itemDetail = (Article) getIntent().getExtras().getSerializable("itemDetail");

        imgItemDetail.setImageResource(Integer.parseInt(itemDetail.getImagen()));
        tvNombreDetail.setText(itemDetail.getNombre());
        tvDescripcionDetail.setText(itemDetail.getDescripcion());
    }
}