from django.db import models


class AGV(models.Model):
    x_coordinate = models.FloatField(default=0.0)
    y_coordinate = models.FloatField(default=0.0)
    timestamp = models.DateTimeField(auto_now_add=True)

class maps(models.Model):
    name = models.CharField(max_length=100)
    image = models.ImageField(upload_to='maps/')

    def __str__(self):
        return self.name