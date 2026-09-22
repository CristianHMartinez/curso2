export interface Aviso {
  id: number;
  titulo: string;
  contenido: string;
  publicado: boolean;
  categoria?: { id: number; nombre: string };
  autor?: string;
  autor_id?: number;
  creado: string;
}

export interface NuevoAviso {
  titulo: string;
  contenido: string;
  categoria_id: number | null;
}
