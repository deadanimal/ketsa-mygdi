import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DataChoiceComponent } from './data-choice.component';

describe('DataChoiceComponent', () => {
  let component: DataChoiceComponent;
  let fixture: ComponentFixture<DataChoiceComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DataChoiceComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DataChoiceComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
