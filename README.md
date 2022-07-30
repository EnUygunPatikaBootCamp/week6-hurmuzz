Lazy Loading : İhtiyaç duyulduğunda sorgu ile çalışır.

Eager Loading: İlgili verileri başlangıçta sorgu sonuçlarıyla birlikte query ve navigation property kısmına yükler ve hafızaya alır.

Farkları: Eager loading tek bir seferde yükleme yaparken Lazy Loading ile birden fazla kez veritabanında sorgu yapılır. Kayıt sayısı arttıkça Lazy loading tek tek load 
işlemi gerçekleştirdiğinden eager loadinge göre daha hızlı bir işlem sağlar.Ancak Lazy loadingin veritabanına daha çok sorgu göndermesinin
program maliyeti daha fazla olur.
