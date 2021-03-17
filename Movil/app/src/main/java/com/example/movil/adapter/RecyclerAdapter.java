package com.example.movil.adapter;

import android.app.LauncherActivity;
import android.content.Intent;
import android.os.Build;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.movil.MainActivity2;
import com.example.movil.model.Article;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.movil.R;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;

public class RecyclerAdapter extends RecyclerView.Adapter<RecyclerAdapter.RecyclerHolder>{
    private List<Article> items;
    private List<Article> originalItems;
    private RecyclerItemClick itemClick;

    private String domain_image = "http://192.168.0.14:8000/imagenes/articulos/";

    public RecyclerAdapter(List<Article> items, RecyclerItemClick itemClick){
        this.items = items;
        this.itemClick = itemClick;
        this.originalItems = new ArrayList<>();
        originalItems.addAll(items);
    }

    @NonNull
    @Override
    public RecyclerHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.articulo_view, parent, false);
        return new RecyclerHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull RecyclerHolder holder, int position) {
        Article item = items.get(position);
       // holder.imgArticulo.setImageResource(item.getImagen());

        Picasso.get()
                .load(domain_image+item.getImagen())
                .into(holder.imgArticulo);
        holder.tvNombre.setText(item.getNombre());
        holder.tvDescripcion.setText(item.getDescripcion());

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                itemClick.itemClick(item);
            }
        });


        /*holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(holder.itemView.getContext(), MainActivity2.class);
                intent.putExtra("itemDetail", item);
                holder.itemView.getContext().startActivity(intent);
            }
        });*/
    }

    @Override
    public int getItemCount() {
        return items.size();
    }

    public void filter(String strSearch){
        if(strSearch.length() == 0){
            items.clear();
            items.addAll(originalItems);
        }
        else {
            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.N) {
                List<Article> collect = originalItems.stream()
                        .filter(i -> i.getNombre().toLowerCase().contains(strSearch))
                        .collect(Collectors.toList());

                items.clear();
                items.addAll(collect);
            }
            else{
                for(Article i:originalItems){
                    items.clear();
                    if (i.getNombre().toLowerCase().contains(strSearch)){
                        items.add(i);
                    }
                }
            }
        }
        notifyDataSetChanged();
    }

    public class RecyclerHolder extends RecyclerView.ViewHolder{
        private ImageView imgArticulo;
        private TextView tvNombre;
        private TextView tvDescripcion;

        public RecyclerHolder(@NonNull View itemView){
            super(itemView);
            imgArticulo = itemView.findViewById(R.id.imgArticulo);
            tvNombre = itemView.findViewById(R.id.tvNombre);
            tvDescripcion = itemView.findViewById(R.id.tvDescripcion);

        }
    }

    public interface RecyclerItemClick{
        void itemClick(Article item);
    }

}
