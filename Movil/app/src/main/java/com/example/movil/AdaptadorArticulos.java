package com.example.movil;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.movil.model.Article;


import java.util.ArrayList;
import java.util.List;

public class AdaptadorArticulos extends RecyclerView.Adapter<AdaptadorArticulos.ArticuloViewHolder> {

    Context context;
    List<Article> articleList;


    public AdaptadorArticulos(Context context, List<Article> articleList) {
        this.context = context;
        this.articleList = articleList;
    }

    @NonNull
    @Override
    public AdaptadorArticulos.ArticuloViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int viewType) {
        View v = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.item_rv_articulo, viewGroup, false);
        return new ArticuloViewHolder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull AdaptadorArticulos.ArticuloViewHolder articuloViewHolder, int i) {
        articuloViewHolder.tvIdArticulo.setText(articleList.get(i).getIdArticulo());
        articuloViewHolder.tvNombre.setText(articleList.get(i).getNombre());
        articuloViewHolder.tvCodigo.setText(articleList.get(i).getCodigo());
        articuloViewHolder.tvDescripcion.setText(articleList.get(i).getDescripcion());
    }

    @Override
    public int getItemCount() {
        return articleList.size();
    }

    public class ArticuloViewHolder extends RecyclerView.ViewHolder {

        TextView tvIdArticulo, tvNombre, tvCodigo, tvDescripcion;

        public ArticuloViewHolder(@NonNull View itemView) {
            super(itemView);

            tvIdArticulo = itemView.findViewById(R.id.tvIdArticulo);
            tvNombre = itemView.findViewById(R.id.tvNombre);
            tvCodigo = itemView.findViewById(R.id.tvCodigo);
            tvDescripcion = itemView.findViewById(R.id.tvDescripcion);
        }
    }
    public void filtrar(ArrayList<Article> filtroArticulos){
        this.articleList = filtroArticulos;
        notifyDataSetChanged();
    }
}
