import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MygeointroComponent } from './mygeointro.component';

describe('MygeointroComponent', () => {
  let component: MygeointroComponent;
  let fixture: ComponentFixture<MygeointroComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MygeointroComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MygeointroComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
