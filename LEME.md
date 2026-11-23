# biblio-iac

Infraestrutura como código das bibliotecas de Ribeira Alta.

| Ficheiro ou cartafol | Para que serve |
| --- | --- |
| `compose.yaml` | Descrición da infraestrutura (esqueleto que completarás) |
| `.env` | Configuración do contorno: versión, porto e nomes. **Non leva contrasinais.** |
| `Dockerfile` | Imaxe da web PHP |
| `src/` | Código da web: `index.php` (catálogo), `saude.php` (comprobación de saúde) e `config.php` (conexión) |
| `initdb/01-catalogo.sql` | Catálogo inicial da base de datos |
| `segredos/` | Ficheiros cos contrasinais. **Nunca se suben a Git.** |
| `copias/` | Destino das copias de seguridade |

## Despregamento rápido

```bash
docker compose up -d --build --wait
```

Web: <http://localhost:8080>
