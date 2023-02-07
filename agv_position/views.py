from django.shortcuts import render
from django.http import JsonResponse
from .models import *


def agv_position(request):
    agv = AGV.objects.last()
    peta = Maps.objects.all()
    robot = Robot.objects.all()
    context = {
        'agv': agv,
        'peta': peta,
        'robot': robot
    }
    return render(request, 'agv_position.html', context)


def agv_position_api(request):
    agv = AGV.objects.last()
    return JsonResponse({'x': agv.x_coordinate, 'y': agv.y_coordinate})
