#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Sat Sep 12 20:54:23 2020

@author: hoangph3
"""
from collections import defaultdict

n = int(input("n="))

edges = []

for _ in range(n):
    edge = input().split(" ")
    edges.append(edge)

node = 0


